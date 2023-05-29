<!DOCTYPE html>
<html>
<head>
	<title>handontabel</title>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />
</head>
<body>

	<div id="example1" class="hot"></div>

	<pre id="example1console" class="console">Click "Load" to load data from server</pre>

</body>

<script type="text/javascript">
	
	// const container = document.querySelector('#example1');

	// const hot = new Handsontable(container, {
	//   data: Handsontable.helper.createSpreadsheetData(100, 10),
	//   colWidths: 100,
	//   width: '100%',
	//   height: 320,
	//   rowHeaders: false,
	//   colHeaders: ['ID', 'Full name', 'Position','Country', 'City', 'Address', 'Zip code', 'Mobile', 'E-mail'],
	//   // colHeaders: true,
	//   fixedColumnsLeft: 1,
	//   fixedRowsTop: 1,
	//   licenseKey: 'non-commercial-and-evaluation'
	// });


	const container = document.querySelector('#example1');
	const exampleConsole = document.querySelector('#example1console');
	let autosaveNotification;

	const hot = new Handsontable(container, {
	  data: [
	    {nama: 'Najib', nim: '0001', catatan: 'Dikembangkan Lagi Kompetensimu', nilai: 0},
	    {nama: 'Bijan', nim: '0002', catatan: 'Dikembangkan Lagi Kompetensimu', nilai: 0},
	    {nama: 'Emun', nim: '0003', catatan: 'Dikembangkan Lagi Kompetensimu', nilai: 0},
	    {nama: 'Adun', nim: '0004', catatan: 'Dikembangkan Lagi Kompetensimu', nilai: 0}
	  ],
	  colHeaders: ['Nama', 'NIM', 'Catatan', 'Nilai'],
	  licenseKey: 'non-commercial-and-evaluation',
	  columns: [
	    {
	      data: 'nama',
	      readOnly: true
	    },
	    {
	      data: 'nim',
	      readOnly: true
	    },
	    {
	      data: 'catatan',
	      readOnly: true
	    },
	    {
			data: 'nilai',
			type: 'numeric',
			numericFormat: {
				pattern: '0,0.00',
				culture: 'en-US'
			},
			allowEmpty: false
	    }
	  ],
	  afterChange: function (change, source) {
	    if (source === 'loadData') {
	      return; //don't save this change
	    }

	   // console.log(change);
	    // if (!autosave.checked) {
	    //   return;
	    // }

	    clearTimeout(autosaveNotification);
	   // console.log(hot.getData());

	    exampleConsole.innerText = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
	      autosaveNotification = setTimeout(() => {
	        exampleConsole.innerText ='Changes will be autosaved';
	      }, 1000);


	    // ajax('/docs/10.0/scripts/json/save.json', 'GET', JSON.stringify({ data: change }), data => {
	    //   exampleConsole.innerText = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
	    //   autosaveNotification = setTimeout(() => {
	    //     exampleConsole.innerText ='Changes will be autosaved';
	    //   }, 1000);
	    // });
	  }
	});

	// var data = [
	//     ['Nama', 'NIM', 'Catatan', 'Mercedes'],
	//     ['Najib', '0001', 'Dikembangkan Lagi Kompetensimu', 0],
	//     ['Bijan', '0002', 'Dikembangkan Lagi Kompetensimu', 0],
	//     ['Emun', '0003', 'Dikembangkan Lagi Kompetensimu', 0],
	//     ['Adun', '0004', 'Dikembangkan Lagi Kompetensimu', 0]
 //  	];

	// const container = document.querySelector('#example1');
	// const exampleConsole = document.querySelector('#example1console');
	// const autosave = document.querySelector('#autosave');
	// const load = document.querySelector('#load');
	// const save = document.querySelector('#save');

	// let autosaveNotification;

	// const hot = new Handsontable(container, {
	//   startRows: 8,
	//   startCols: 6,
	//   rowHeaders: true,
	//   colHeaders: true,
	//   height: 'auto',
	//   licenseKey: 'non-commercial-and-evaluation',
	//   afterChange: function (change, source) {
	//     if (source === 'loadData') {
	//       return; //don't save this change
	//     }

	//     // if (!autosave.checked) {
	//     //   return;
	//     // }

	//     clearTimeout(autosaveNotification);
	//     console.log(hot.getData());

	//     exampleConsole.innerText = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
	//       autosaveNotification = setTimeout(() => {
	//         exampleConsole.innerText ='Changes will be autosaved';
	//       }, 1000);


	//     // ajax('/docs/10.0/scripts/json/save.json', 'GET', JSON.stringify({ data: change }), data => {
	//     //   exampleConsole.innerText = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
	//     //   autosaveNotification = setTimeout(() => {
	//     //     exampleConsole.innerText ='Changes will be autosaved';
	//     //   }, 1000);
	//     // });
	//   }
	// });

 //    hot.loadData(data);

	// function ajax(url, method, params, callback) {
	//   let obj;

	//   try {
	//     obj = new XMLHttpRequest();
	//   } catch (e) {
	//     try {
	//       obj = new ActiveXObject('Msxml2.XMLHTTP');
	//     } catch (e) {
	//       try {
	//         obj = new ActiveXObject('Microsoft.XMLHTTP');
	//       } catch (e) {
	//         alert('Your browser does not support Ajax.');
	//         return false;
	//       }
	//     }
	//   }
	//   obj.onreadystatechange = () => {
	//     if (obj.readyState == 4) {
	//       callback(obj);
	//     }
	//   };
	//   obj.open(method, url, true);
	//   obj.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	//   obj.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	//   obj.send(params);

	//   return obj;
	// }

</script>
</html>