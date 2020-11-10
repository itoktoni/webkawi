@if(config('website.env') == 'local')
@include(Helper::setExtendBackend('jsdev'))
@else
@include(Helper::setExtendBackend('jspro'))
@endif
@stack('js')
<script src="{{ Helper::backend('vendor/jquery/jquery.checkboxes.js') }}"></script>
<script src="{{ Helper::backend('vendor/jquery/jquery.alertable.min.js') }}"></script>
<script src="{{ Helper::backend('vendor/jquery/arrow-table.min.js') }}"></script>
<script src="{{ Helper::backend('vendor/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ Helper::backend('javascripts/theme.custom.js') }}"></script>
@if(config('website.pjax'))
<script src="{{ Helper::backend('javascripts/pjax.js') }}"></script>
@if(config('website.env') == 'local')
<script src="{{ Helper::backend('vendor/pjax/pjax.min.js') }}"></script>
@else
<script src="https://cdn.jsdelivr.net/npm/pjax@0.2.8/pjax.min.js"></script>
@endif
@endif

<script>
$(document).ready(function() {
    $("select.form-control").chosen();
});
</script>

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