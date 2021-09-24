

function myFunction() {
    var v = document.getElementById("brgr");
    var w = document.getElementById("cros");
    var x = document.getElementById("myDIV");
    var y = document.getElementById("hide")

    if (x.style.display === "block") {
      x.style.display = "none";
      y.style.display = "block";
      v.style.display = "block";
      w.style.display = "none";


    } else {
      x.style.display = "block";
      y.style.display = "none";
      v.style.display = "none";
      w.style.display = "block";
    }
  }


  