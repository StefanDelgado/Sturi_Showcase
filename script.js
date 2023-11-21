console.log(imgObject);

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

document.getElementById("outer3").addEventListener("click", toggleState3);
    
function toggleState3() {
  let galleryView = document.getElementById("galleryView")
  let tilesView = document.getElementById("tilesView")
  let outer = document.getElementById("outer3");
  let slider = document.getElementById("slider3");
  let tilesContainer = document.getElementById("tilesContainer");
  
  if (slider.classList.contains("active")) {
    slider.classList.remove("active");
    outer.classList.remove("outerActive");
    galleryView.style.display = "flex";
    tilesView.style.display = "none";
    
    while (tilesContainer.hasChildNodes()) {
      tilesContainer.removeChild(tilesContainer.firstChild)
      }  
    } else {
        slider.classList.add("active");
        outer.classList.add("outerActive");
        galleryView.style.display = "none";
        tilesView.style.display = "flex";

        for (let i = 0; i < imgObject.length; i++) {
            let tileItem = document.createElement("div");
            tileItem.classList.add("tileItem");
            tileItem.style.background = "url(" + imgObject[i].replace(/^\.\//, '') + ")";
            tileItem.style.backgroundSize = "contain";
            tileItem.style.backgroundRepeat = "no-repeat";
            tilesContainer.appendChild(tileItem);
        }
    };
}



let mainImg = 0;
let prevImg = imgObject.length - 1;
let nextImg = 1;

function loadGallery() {

 let mainView = document.getElementById("mainView");
 mainView.style.background = "url(" + imgObject[mainImg].replace(/^\.\//, '') + ")";
 mainView.style.backgroundSize = "cover";


 let leftView = document.getElementById("leftView");
 leftView.style.background = "url(" + imgObject[prevImg].replace(/^\.\//, '') + ")";
 leftView.style.backgroundSize = "cover";

 let rightView = document.getElementById("rightView");
 rightView.style.background = "url(" + imgObject[nextImg].replace(/^\.\//, '') + ")";
 rightView.style.backgroundSize = "cover";
  
 let linkTag = document.getElementById("linkTag")
 linkTag.href = imgObject[mainImg];

};

function scrollRight() {
  
 prevImg = mainImg;
 mainImg = nextImg;
 if (nextImg >= (imgObject.length -1)) {
    nextImg = 0;
 } else {
    nextImg++;
 }; 
 loadGallery();
};

function scrollLeft() {
 nextImg = mainImg
 mainImg = prevImg;
   
 if (prevImg === 0) {
    prevImg = imgObject.length - 1;
 } else {
    prevImg--;
 };
 loadGallery();
};

document.getElementById("navRight").addEventListener("click", scrollRight);
document.getElementById("navLeft").addEventListener("click", scrollLeft);
document.getElementById("rightView").addEventListener("click", scrollRight);
document.getElementById("leftView").addEventListener("click", scrollLeft);
document.addEventListener('keyup',function(e){
    if (e.keyCode === 37) {
    scrollLeft();
 } else if(e.keyCode === 39) {
    scrollRight();
 }
});

loadGallery();


