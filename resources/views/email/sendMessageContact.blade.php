<html>
    <body>
        <h1>Message from {{ $dataMessage['name'] ?? '' }}</h1>
        <p>{{ $dataMessage['email'] ?? '' }}</p>
        <p>{{ $dataMessage['message'] ?? '' }}</p>
    </body>
</html>
