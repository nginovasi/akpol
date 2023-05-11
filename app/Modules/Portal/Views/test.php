<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<form id="form" autocomplete="off" method="POST" action="http://devel.akpol.ac.id/portal/pdf/kumulatif">
        <?=csrf_field();?>
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label for="aspek">Aspek</label>
                    <input type="text" class="form-control" id="aspek" name="aspek"  placeholder="Aspek">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label for="min_nilai">Nilai Minimal</label>
                    <input type="tel" class="form-control" id="min_nilai" name="min_nilai" placeholder="Nilai Minimal">
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>


	<script type="application/javascript">
		var form = new FormData();
			form.append("esdlc_token", "5c74f8e57e8b38576b520b78b71206f9");
			form.append("asd", "23");

			var settings = {
			  "url": "http://devel.akpol.ac.id/portal/pdf/kumulatif",
			  "method": "POST",
			  "timeout": 0,
			  "headers": {
			    "Authorization": "Bearer dev"
			  },
			  "processData": false,
			  "mimeType": "multipart/form-data",
			  "contentType": false,
			  "data": form
			};

			$.ajax(settings).done(function (response) {
			  console.log(response);
			});
	</script>
</body>
</html>