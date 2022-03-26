@if (!session()->has('email'))
<script>
window.location.href = "/login";
    </script>
@endif
