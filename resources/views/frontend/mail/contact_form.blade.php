@php
    $table_style = "style='width:100%;margin-left:auto;marrgin-right:auto;'";
    $font_size_14 = "style='font-size:14px'";
    $w100 = "style='width:100%'";
@endphp
<html>
<head>
    <title>Email new booking</title>
</head>
<body>
<table {!! $table_style !!}>
    <tbody>
    <tr>
        <td align="center" {!! $font_size_14 !!}>
            <table {!! $w100 !!}>
                <tbody>
                <tr>
                    <td>
                        <p>Hello,</p>

                        <p>You have contact from website {{setting('app_name')}}</p>

                        <p>First name: {{$first_name}}</p>
                        <p>Last name: {{$last_name}}</p>
                        <p>Email: {{$email}}</p>
                        <p>Phone: {{$phone_number}}</p>
                        <p>Message: {{$note}}</p>

                        <p>
                            <em>
                                Email from system,<br />
                                {{setting('app_name')}}
                            </em>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>