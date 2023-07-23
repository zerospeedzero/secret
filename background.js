// Generate random color
function color () {
  const r = Math.floor(Math.random() * 255) ;
  const g = Math.floor(Math.random() * 255) ;
  const b = Math.floor(Math.random() * 255) ;
  const color = 'rgba(' + r + ',' + g + ',' + b +',1.0)';
  return color;
}
// Paint on canvas
function painting (page) {
  ctx.fillStyle = '#0001';
  ctx.fillRect(0, 0, width, height);
  let text = '';
  // console.log(page);
  y_position.forEach((yPos, index) => {
    if (page == 3) {
      const select_col = Math.floor(Math.random() * 100);
      if (select_col == 10) {
        text = "Artificial Intelligence";
      } else if (select_col == 20) {
        text = "IT Operations";
      } else {
        text = "";
      }
      const fontSize = Math.random() * 50;
      ctx.fillStyle = color();
      ctx.font = fontSize + 'pt Arial'; 
    } else {
      ctx.font = '15pt monospace';
      text = String.fromCharCode(Math.random() * 128);
      if (page == 2) {
        ctx.fillStyle = color();
        const pick_size = Math.floor(Math.random() * 50);
        if (pick_size == 10) {
          ctx.font = '18pt monospace';
          ctx.fillStyle = '#0F0';
        }  
      } else {
        ctx.fillStyle = '#0f0';
      }
    }
    const xPos = index * 18;
    ctx.fillText(text, xPos, yPos);
    if (yPos > 100 + Math.random() * height * 15) {
      y_position[index] = 0;
    }
    else {
      y_position[index] = yPos + 18;
    }
  });
}

const canvas = document.getElementById('background');
const ctx = canvas.getContext('2d');
const width = canvas.width = canvas.getBoundingClientRect().width;
const height = canvas.height = canvas.getBoundingClientRect().height;
const columns = Math.floor(width / 18) + 1;
const y_position = Array(columns).fill(0);
console.log(columns);
console.log(y_position);
ctx.fillStyle = '#000';
ctx.fillRect(0, 0, width, height);
let page = 0;

// Determine pages for running javascript code to paint on canvas
let element = document.getElementById('secret') ;
if (typeof(element) != 'undefined' && element != null ) {
  if (window.getComputedStyle(element).display === 'block') {
    page = 3;
  } 
} else {
  let element = document.getElementById('section-1') ;
  if (typeof(element) != 'undefined' && element != null ) {
    if (window.getComputedStyle(element).display === 'block') {
      page = 2;
    } else {
      page = 1;
    }
  }  
}    

setInterval(painting, 60, page);