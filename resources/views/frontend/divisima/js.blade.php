
<script src="{{ Helper::backend('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ Helper::backend('vendor/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script src="{{ Helper::frontend('js/bootstrap.min.js') }}"></script>
<script src="{{ Helper::frontend('js/jquery.slicknav.min.js') }}"></script>
<script src="{{ Helper::frontend('js/owl.carousel.min.js') }}"></script>
<script src="{{ Helper::frontend('js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ Helper::frontend('js/jquery.zoom.min.js') }}"></script>
<script src="{{ Helper::frontend('js/notiny.min.js') }}"></script>
<script src="{{ Helper::backend('vendor/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{ Helper::frontend('js/main.js') }}"></script>

@stack('javascript')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '382720886107028'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=382720886107028&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->