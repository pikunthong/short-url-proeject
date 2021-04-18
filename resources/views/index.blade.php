

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    @if($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif
    <a href="/new">create</a>
    <p> Your Quota Remaining {{ 10-count($urls) }}/10 </p>
    @if(!$urls->isEmpty())
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <td>Long URL</td>
                <td>Short URL</td>
                <td>Create</td>
            </tr>
            </thead>
            <tbody>
            @foreach($urls as $url)
                <tr>
                    <td>{{ $url->long_url }}</td>
                    <td><a href="/gt/{{ $url->short_url }}" target="_blank">{{ $url->short_url }}</a></td>
                    <td>{{ $url->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>
</html>



