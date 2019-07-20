<!DOCTYPE html>
<html>
<head>
  <title></title>


  <style type="text/css">
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #4CAF50;
        color: white;
    }
  </style>
</head>
<body>
<div id="test">
  <table>
    <tr>
      <th>Header 1</th>
      <th>Header 2</th>
      <th>Header 3</th>
    </tr>
    <tr>
      <td>Hello</td>
      <td>I</td>
      <td>am</td>
    </tr>
    <tr>
      <td>a</td>
      <td>table</td>
      <td>.</td>
    </tr>
  </table>
  <h1 style="text-align: center">
    pdfmake
  </h1>
  <p>pdfmake does not generate pdfs from the html. Rather, it generates them directly from javascript.</p>
  <p>It is very fast, but very limited, especially compared to PHP alternatives.</p>
  <p>To get a pdf that looks like the page, you could use html2canvas, which generates an image that can be inserted into the pdf. I think this is a hack and not ideal</p>
</div>

<a href="javascript:generatePDF()">Dowload PDF</a>
  <script type="text/javascript">
    function generatePDF() {
      var documentDefinition = {
        content: 
        [
          {
            table: 
            {
              headerRows: 1,
              widths: [ '*', '*', '*', '*' ],
              body: [
                [
                  { text: 'Header 1', style: 'tableHeader' }, 
                  { text: 'Header 2', style: 'tableHeader' }, 
                  { text: 'Header 3', style: 'tableHeader' }
                ],
                [
                  { text: 'Hello' }, 
                  { text: 'I' }, 
                  { text: 'am' }
                ],
                [
                  { text: 'a' }, 
                  { text: 'table' }, 
                  { text: '.' }
                ]
              ]
            }
          },
          {
            text: 'pdfmake', style: 'header' 
          },
          'pdfmake does not generate pdfs from the html. Rather, it generates them directly from javascript.',
          'It is very fast, but very limited, especially compared to PHP alternatives.',
          'To get a pdf that looks like the page, you could use html2canvas, which generates an image that can be inserted into the pdf. I think this is a hack and not ideal',
        ],
        styles: 
        {
          header: 
          {
            fontSize: 18,
            bold: true,
            margin: [0, 10, 0, 10],
            alignment: 'center'
          },
          tableHeader: 
          {
            fillColor: '#4CAF50',
            color: 'white'
          }
        }
      };
      
      pdfMake.createPdf(documentDefinition).download('testdoc.pdf');
    }
  </script>
</body>
</html>