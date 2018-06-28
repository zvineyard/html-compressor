<?php namespace Vineyard\CompressorPlugin;

use Twig_Node;

class CompressHtmlNode extends Twig_Node
{
    public function __construct(array $nodes = array(), array $attributes = array(), $line_number = 0, $tag = null)
    {
        parent::__construct($nodes, $attributes, $line_number, $tag);
    }

    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('content'))
            ->write("echo preg_replace(['/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s'],['>','<','\\1'],ob_get_clean());" . "\n");
    }
}
