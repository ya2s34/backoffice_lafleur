@if(isset($action))
<form action="{{$action}}" {{ $attributes->merge(['type' => 'submit', 'class' => ' cursor-pointer inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150']) }} method="POST">
    @method('DELETE') @csrf
    <input type="submit" value="SUPPRIMER" class="btn-red cursor-pointer">
</form>
@endif