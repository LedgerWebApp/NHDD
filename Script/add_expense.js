// function ExpenseDropdown() {
//   //console.lot("hello");
//     document.getElementById("dropdown").classList.toggle("show");
//     var dropdown_display = document.getElementById("dropdown");
//     if(check)
//     dropdown_display.style.display="block";
//     else
//     dropdown_display.style.display="none";
// }
// function ExpenseReportDropdown() {
//     var check = document.getElementById("dropdown_er").classList.toggle("show");
//     var dropdown_display = document.getElementById("dropdown_er");
//     if(check)
//     dropdown_display.style.display="block";
//     else
//     dropdown_display.style.display="none";
// }
// function viewingExp(){
//   console.log("hello");
//   var check = document.getElementById("dropdown_vr").classList.toggle("show");
//   var dropdown_display = document.getElementById("dropdown_vr");
//   if(check)
//   dropdown_display.style.display="block";
//   else
//   dropdown_display.style.display="none";
// }
class dropdown{
  constructor(){
    if(this.constructor === dropdown){
      throw new Error("you can't instantiate a object of abstract class")
    }
  }
  displayDropDown(dropdownEle,toggleClass){
    throw new Error("Abstract Method has no implementation");
  }

}
class viewExpDropdown extends dropdown{
  displayDropDown(dropdownEle,toggleClass){
  var check = document.getElementById(dropdownEle).classList.toggle(toggleClass);
  var dropdown_display = document.getElementById(dropdownEle);
  if(check)
  dropdown_display.style.display="block";
  else
  dropdown_display.style.display="none";
  }
}
var viewObj = new viewExpDropdown()
var ExpenseObj = new viewExpDropdown()
var ExpenseReportObj = new viewExpDropdown()
function viewingExp(){
  console.log("dsds")
  viewObj.displayDropDown("dropdown_vr","show");
}
function ExpenseDropdown() {
  ExpenseObj.displayDropDown("dropdown","show")

}
function ExpenseReportDropdown(){
  ExpenseReportObj.displayDropDown("dropdown_er","show");
}
