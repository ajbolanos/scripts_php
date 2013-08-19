<?php
namespace Eshu\Google;

class GoogleAnalytics{
  public static $options   = array();

  function __construct(){

  }

  public function getOptions(){
    return self::$options;
  }

  public function setOption($name, $value){
    self::$options[$name] = $value;
  }

  public function getOption($name){
    return isset(self::$options[$name]) ? self::$options[$name] : false;
  }


  public function process(){

    if ( ! isset(self::$options['account'], self::$options['domain']) ) return false;

    $gaq = array(
      'account'          => '_setAccount',
      'domain'           => '_setDomainName',
      'campaign_name'    => '_setCampNameKey',
      'campaign_source'  => '_setCampSourceKey',
      'campaign_medium'  => '_setCampMediumKey',
      'campaign_term'    => '_setCampTermKey',
      'campaign_content' => '_setCampContentKey',
    );

    $out = array(
      'var _gaq = _gaq || [];',
    );

    if (isset(self::$options['inpage_links']) && self::$options['inpage_links'] == true){
      $out[] = 'var pluginUrl = \'//www.google-analytics.com/plugins/ga/inpage_linkid.js\';';
      $out[] = '_gaq.push([\'_require\', \'inpage_linkid\', pluginUrl]);';
    }

    foreach (self::$options as $k => $v){
      if (array_key_exists($k, $gaq)){
        $out[] = "_gaq.push(['{$gaq[$k]}', '{$v}']);";
      }
    }

    $out[] = "_gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = TRUE;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    ";

    // Ga has been initailized and loaded
    self::setOption('processed', true);

    return implode("\n", $out);
  }

  public function trackEvent($name, $type='clicked', $long=false){

    switch ($type){
      case 'clicked':
        return self::trackClick($name, $long);
        break;

      default:
        return false;
    }
  }

  public function trackClick($name, $long=false){
    return $long ?
      "onclick=\"_gaq.push(['_trackEvent', '{$name}', 'clicked'])\"" :
      "_gaq.push(['_trackEvent', '{$name}', 'clicked'])";
  }
}