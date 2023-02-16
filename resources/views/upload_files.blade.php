<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Gambling.com File Upload</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload File
            </button>
        </form>


        @isset( $allrecords )
            <div style="margin-top: 50px;">
                <h1>Affiliates Within 100km </h1>
                <table class="table">
                    <tr>
                        <th>Affiliate ID</th>
                        <th>Name</th>
                    </tr>

                    @foreach( $allrecords as $record )
                        <tr>
                            <td>
                                {{ $record->affiliate_id }}
                            </td>
                            <td>
                                {{ $record->affiliate_name }}
                            </td>
                        </tr>
                    @endforeach
            </div>
        @endisset

    </div>
</body>
</html>
