@if (!session()->has('errorusername'))
<script>
window.location.href = "/login";
    </script>
@endif
