<?php namespace Vineyard\HtmlCompressionPlugin;

use Twig_Token;
use Twig_TokenParser;
use Vineyard\HtmlCompressionPlugin\CompressHtmlNode;

class CompressHtmlTokenParser extends Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $line_number = $token->getLine();
        $stream = $this->parser->getStream();
        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideHtmlCompressEnd'), true);
        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        $nodes = array('content' => $body);
        return new CompressHtmlNode($nodes, array(), $line_number, $this->getTag());
    }

    public function getTag()
    {
        return 'htmlcompress';
    }

    public function decideHtmlCompressEnd(Twig_Token $token)
    {
        return $token->test('endhtmlcompress');
    }
}
