const label_a = document.getElementById("a");
const label_b = document.getElementById("b");
const label_c = document.getElementById("c");
const label_d = document.getElementById("d");
const label_e = document.getElementById("e");

const input_a = document.getElementById("input_a");
const input_b = document.getElementById("input_b");
const input_c = document.getElementById("input_c");
const input_d = document.getElementById("input_d");
const input_e = document.getElementById("input_e");

if (input_a.checked) {
  label_a.classList.add("bg-green-500");
  label_b.classList.remove("bg-green-500");
  label_c.classList.remove("bg-green-500");
  label_d.classList.remove("bg-green-500");
  label_e.classList.remove("bg-green-500");
} 
else if (input_b.checked) {
  label_b.classList.add("bg-green-500");
  label_a.classList.remove("bg-green-500");
  label_c.classList.remove("bg-green-500");
  label_d.classList.remove("bg-green-500");
  label_e.classList.remove("bg-green-500");
}
else if (input_c.checked) {
  label_c.classList.add("bg-green-500");
  label_a.classList.remove("bg-green-500");
  label_b.classList.remove("bg-green-500");
  label_d.classList.remove("bg-green-500");
  label_e.classList.remove("bg-green-500");
}
else if (input_d.checked) {
  label_d.classList.add("bg-green-500");
  label_a.classList.remove("bg-green-500");
  label_b.classList.remove("bg-green-500");
  label_c.classList.remove("bg-green-500");
  label_e.classList.remove("bg-green-500");
}
else if (input_e.checked) {
  label_e.classList.add("bg-green-500");
  label_a.classList.remove("bg-green-500");
  label_b.classList.remove("bg-green-500");
  label_c.classList.remove("bg-green-500");
  label_d.classList.remove("bg-green-500");
}