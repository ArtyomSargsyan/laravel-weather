<!DOCTYPE html>
<html>
<head>
    <title>Place</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

<div>
    <input type="text" id="pac-input" />
</div>


<script>
    function initMap(){

        const input = document.getElementById("pac-input");
        const options = {
            componentRestrictions: { country: "us" },
            fields: ["address_components", "geometry", "icon", "name"],
            strictBounds: false,
            types: ["establishment"],
        };
        const autocomplete = new google.maps.places.Autocomplete(input, options);


        autocomplete.addListener("place_changed", () => {
            const place = autocomplete.getPlace();

        });
        var data = "Erevan";
        $.ajax({
            url: "{{route('weather.send')}}",
            data:  {data} ,
            method: "post",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                console.log(data)
                document.write(
                    '<h2>'+data.name+ '</h2>',
                    '<h3>'+ data.main.temp+ '</h3>'

                )
            },
        });
    }





</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3dUGbYrAQRMdCu58wcZ_HmX3oIzMK7us&libraries=places&callback=initMap"></script>

</body>
</html>
