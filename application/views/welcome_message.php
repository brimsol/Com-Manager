<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Welcome to Codeignite</title>
		<style>
					body {
				margin: 0;
				font-family: 'Chango', cursive;
				text-align: center;
				font-size: 60px;
				color: #999;
			}

			.welcome {
				height: 300px;
				left: 50%;
				margin-left: -250px;
				margin-top: -150px;
				position: absolute;
				top: 55%;
				width: 300px;
			}

			a, a:visited {
				color: #FF5949;
				text-decoration: none;
			}

			a:hover {
				text-decoration: underline;
			}

			ul li {
				display: inline;
				margin: 0 1.2em;
			}

			p {
				margin: 2em 0;
				color: #555;
			}
		</style>
	</head>
	<body>
		<div class="welcome">
			<a href="<?php echo site_url('admin');?>"><img alt="" src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABkAAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjY4MzZGMzZGRDVBNzExRTI4QUUyOUU0QTREOUE3NEFCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjY4MzZGMzcwRDVBNzExRTI4QUUyOUU0QTREOUE3NEFCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NjgzNkYzNkRENUE3MTFFMjhBRTI5RTRBNEQ5QTc0QUIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NjgzNkYzNkVENUE3MTFFMjhBRTI5RTRBNEQ5QTc0QUIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAABAQEBAQEBAQEBAQEBAQEBAQEB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" />
                        </a>
                            <div>
	</body>
</html>