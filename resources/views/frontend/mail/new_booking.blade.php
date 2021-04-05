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

                        <p>You have booking from website {{setting('app_name')}}</p>

                        <p>Name: {{$name}}</p>
                        <p>Email: {{$email}}</p>
                        <p>Phone number: {{$phone}}</p>
                        <p>Place name: {{$place}}</p>
                        <p>Datetime: {{$datetime}}</p>
                        <p>Number of adult: {{$numberofadult}}</p>
                        <p>Number of children: {{$numberofchildren}}</p>
                        <p>Message: {{$text_message}}</p>
                        <p>Booking at: {{$booking_at}}</p>

                        <p>
                            <em>
                                Email from system,<br/>
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