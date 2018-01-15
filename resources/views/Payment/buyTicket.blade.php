@extends('master')


@section('content')



    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="UAGKT2H7QU23C">
        <input type="image" src="https://www.paypalobjects.com/nl_NL/NL/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, de veilige en complete manier van online betalen.">
        <img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
    </form>







@endsection