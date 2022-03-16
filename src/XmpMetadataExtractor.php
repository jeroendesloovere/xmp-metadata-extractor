<?php

namespace JeroenDesloovere\XmpMetadataExtractor;

use DOMDocument;
use JeroenDesloovere\XmpMetadataExtractor\Exception\FileNotFoundException;
use SplFileInfo;

final class XmpMetadataExtractor
{
    private const DEFAULT_NAMESPACE = 'x';
    protected const RDF_ALT = 'rdf:Alt';
    protected const RDF_BAG = 'rdf:Bag';
    protected const RDF_LI = 'rdf:li';
    protected const RDF_SEQ = 'rdf:Seq';
    protected const POSSIBLE_CONTAINERS = [
        self::RDF_ALT,
        self::RDF_BAG,
        self::RDF_SEQ,
    ];

    /**
     * @var string
     */
    private $namespace;

    public function __construct(string $namespace = self::DEFAULT_NAMESPACE)
    {
        $this->namespace = $namespace;
    }

    private function convertDomNode($node)
    {
        switch ($node->nodeType) {
            case XML_CDATA_SECTION_NODE:
            case XML_TEXT_NODE:
                return trim($node->textContent);

                break;
            case XML_ELEMENT_NODE:
                return $this->convertXmlNode($node);

                break;
        }
    }

    private function convertXmlNode($node)
    {
        $output = [];

        for ($i = 0, $m = $node->childNodes->length; $i < $m; $i++) {
            $child = $node->childNodes->item($i);
            $v = $this->convertDomNode($child);

            if (isset($child->tagName)) {
                $t = $child->tagName;
                if (!isset($output[$t])) {
                    $output[$t] = array();
                }
                $output[$t][] = $v;
            } elseif ($v || $v === '0') {
                $output = (string)$v;
            }
        }

        // Has attributes but isn't an array
        if ($node->attributes->length && !is_array($output)) {
            // Change output into an array.
            $output = array('@content' => $output);
        }

        if (is_array($output)) {
            if ($node->attributes->length) {
                $a = array();
                foreach ($node->attributes as $attrName => $attrNode) {
                    $a[$attrName] = (string)$attrNode->value;
                }
                $output['@attributes'] = $a;
            }

            foreach ($output as $t => $v) {
                // We are combining arrays for rdf:Bag, rdf:Alt, rdf:Seq
                if (in_array($t, self::POSSIBLE_CONTAINERS)) {
                    if (!array_key_exists(self::RDF_LI, $v[0])) {
                        break;
                    }

                    $output = $v[0][self::RDF_LI];
                } elseif (is_array($v) && count($v) == 1 && $t != '@attributes') {
                    $output[$t] = $v[0];
                }
            }
        }

        return $output;
    }

    public function extractFromContent(string $content): array
    {
        try {
            $doc = new DOMDocument();
            $doc->loadXML($this->getXmpXmlString($content));

            $root = $doc->documentElement;
            $output = $this->convertDomNode($root);
            $output['@root'] = $root->tagName;

            return $output;
        } catch (\Exception $e) {
            return [];
        }
    }

    public function extractFromFile(string $file): array
    {
        try {
            $file = new SplFileInfo($file);
            $contents = file_get_contents($file->getPathname());
        } catch (\Exception $e) {
            throw new FileNotFoundException('The given File could not be found.');
        }

        return $this->extractFromContent($contents);
    }

    private function getXmpXmlString(string $content): string
    {
        $xmpDataStart = strpos($content, '<' . $this->namespace . ':xmpmeta');
        $xmpDataEnd = strpos($content, '</' . $this->namespace . ':xmpmeta>');
        $xmpLength = $xmpDataEnd - $xmpDataStart;

        return substr($content, $xmpDataStart, $xmpLength + strlen($this->namespace) + 11);
    }
}
