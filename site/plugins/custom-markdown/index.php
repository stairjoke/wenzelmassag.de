<?php

use Michelf\MarkdownExtra;

Kirby::plugin('stairjoke/custom-markdown', [
  'components' => [
    'markdown' => function(Kirby $kirby, ?string $text = null, array $options = [], bool $inline = false){
      
      // Create an instance of MarkdownExtra
      $markdown = new MarkdownExtra();
      
      // Configuring Markdown
      $markdown->fn_backlink_html = "&#x2934; (scroll back)";
      $markdown->omit_footnotes = true; //Do not append footnotes at the end of parsed text.
      
      // Parse the $text using this instance
      $text = $markdown->transform($text); //Let Markdown do its thing.
      
      // Add commas and spaces to footnote-reference-links
      $text = preg_replace(
        '/(<sup id="fnref:[^"]+"><a[^>]*>[^<]+)(<\/a>)(<\/sup>)(?=\s*<sup id="fnref:[^"]+">)/',
        '$1,$2 $3',
        $text
      );
      
      // Assemble the text and footnotes with a deading
      if( ! empty($markdown->footnotes_assembled)) {
        $text .= "\n\n";
        $text .= "<div class=\"footnotes\" role=\"doc-endnotes\">\n";
        $text .= "<hr" . $markdown->empty_element_suffix . "\n";
        $text .= "<h2>".t('footnotes', 'Footnotes')."</h2>";
        $text .= $markdown->footnotes_assembled;
        $text .= "</div>";
      }
      
      // Return parsed text to Kirby
      return $text;
    }
  ]
]);

?>
