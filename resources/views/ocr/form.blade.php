<center>
	<h1>{{ $title }}</h1>
	<form action="{{ URL('ocr-api/v1/upload-file') }}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="file" name="file" name="file">
		<br>
		<button type="submit">Upload</button>
	</form>
</center>