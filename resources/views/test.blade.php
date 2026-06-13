<form id="auto-submit" action="{{ route('admin.products.destroy', \App\Models\Product::first()->id) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
<script>
    document.getElementById('auto-submit').submit();
</script>
