if (window.innerWidth >= 768) {
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];

  (function() {
    var gads = document.createElement('script');
    gads.async = true;
    gads.type = 'text/javascript';
    var useSSL = 'https:' == document.location.protocol;
    gads.src = (useSSL ? 'https:' : 'http:') +
      '//www.googletagservices.com/tag/js/gpt.js';
    var node = document.getElementsByTagName('script')[0];
    node.parentNode.insertBefore(gads, node);
  })();

  googletag.cmd.push(function() {
    googletag.defineSlot('/7264022/Flaunt_728x90_Int', [728, 90], 'div-gpt-ad-1441212117357-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
  
  googletag.cmd.push(function() {
    googletag.defineSlot('/7264022/Flaunt_bf728x90_Int', [728, 90], 'div-gpt-ad-1441281518158-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
}