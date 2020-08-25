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

  var gptAdSlots = [];

  googletag.cmd.push(function() {
   var mapping = googletag.sizeMapping().
   addSize([728, 90], [728, 90]).
   addSize([0, 0], [320, 100]).build();

   gptAdSlots[1] = googletag.defineSlot('/162717810/CA-MarketingChoiceMedia/728x90', [728, 90], '728x90').
   defineSizeMapping(mapping).addService(googletag.pubads());
   googletag.enableServices();
 });
}