<?php $thisPage="contact"; ?>
<!-- XML CONTENT SCRIPT -->
    <script> //JS FUNCTION for loading and parsing XML DATA
    function loadXMLDoc(filename)
    {
    if (window.ActiveXObject)
      {
      xhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }
    else
      {
      xhttp = new XMLHttpRequest();
      }
    xhttp.open("GET", filename, false);
    try {xhttp.responseType = "msxml-document"} catch(err) {} // Helping IE11
    xhttp.send("");
    return xhttp.responseXML;
    }

    function displayResult()
    {
    xml3 = loadXMLDoc("bands.xml");
    xml2 = loadXMLDoc("theatre.xml");
    xml1 = loadXMLDoc("film.xml");
    xsl = loadXMLDoc("contentStyling.xsl"); // loads XSLT stylesheet
    // code for IE
    if (window.ActiveXObject || xhttp.responseType == "msxml-document")
      {
      ex = xml3.transformNode(xsl);
      document.getElementById("bands").innerHTML = ex;
      ex = xml2.transformNode(xsl);
      document.getElementById("theatre").innerHTML = ex;
      ex = xml1.transformNode(xsl);
      document.getElementById("film").innerHTML = ex;

      }
    // code for Chrome, Firefox, Opera, etc.
    else if (document.implementation && document.implementation.createDocument)
      {
      xsltProcessor = new XSLTProcessor();
      xsltProcessor.importStylesheet(xsl);
      resultDocument = xsltProcessor.transformToFragment(xml3, document);
      document.getElementById("bands").appendChild(resultDocument);
      resultDocument = xsltProcessor.transformToFragment(xml2, document);
      document.getElementById("theatre").appendChild(resultDocument);
      resultDocument = xsltProcessor.transformToFragment(xml1, document);
      document.getElementById("film").appendChild(resultDocument);

      }
    }
    </script>
<body onload="displayResult()"><!-- TRIGGERS DISPLAY for XML DATA received from JS function -->

      <div class="inner cover">
        <h1 class="cover-heading">RÉSUMÉ</h1>
        <p class="lead">Contact Alison: <a href="mailto:squeezeboxalley@gmail.com?subject=feedback">Email me</a></p>
        <p class="lead">
          <!-- <a href="#" class="btn btn-lg btn-default">Learn more</a> -->
        </p>
      </div>
      <div class="container-fluid">
        <div class="content_BG">
          <div class="content" style="padding-left:20%;padding-right:20%;">

            <div class="headings">FILM</div>
            <div id="film"></div><!-- DISPLAYS XML DATA received from JS function -->
            <div class="headings">THEATRE</div>
            <div id="theatre"></div><!-- DISPLAYS XML DATA received from JS function -->
            <div class="headings">BANDS</div>
            <div id="bands"></div><!-- DISPLAYS XML DATA received from JS function -->

          </div>
        </div>
      </div>
</body
