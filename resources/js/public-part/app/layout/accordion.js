$(document).ready(function (){
    //this is the button
    let acc = document.getElementsByClassName("course-accordion");
    let i;

    for (i = 0; i < acc.length; i++) {
        //when one of the buttons are clicked run this function
        acc[i].onclick = function() {
            //variables
            let panel = this.nextElementSibling;
            let coursePanel = document.getElementsByClassName("course-panel");
            let courseAccordion = document.getElementsByClassName("course-accordion");
            let courseAccordionActive = document.getElementsByClassName("course-accordion active");

            /* if panel is already open - minimize */
            if (panel.style.maxHeight){
                //minifies current panel if already open
                panel.style.maxHeight = null;
                //removes the 'active' class as toggle didn't work on browsers minus chrome
                this.classList.remove("active");
            } else {
                //panel isn't open...
                //goes through the buttons and removes the 'active' css (+ and -)
                for (let ii = 0; ii < courseAccordionActive.length; ii++) {
                    courseAccordionActive[ii].classList.remove("active");
                }
                //Goes through and removes 'active' from the css, also minifies any 'panels' that might be open
                for (let iii = 0; iii < coursePanel.length; iii++) {
                    this.classList.remove("active");
                    coursePanel[iii].style.maxHeight = null;
                }
                //opens the specified pannel
                panel.style.maxHeight = panel.scrollHeight + "px";
                //adds the 'active' addition to the css.
                this.classList.add("active");
            }
        }
    }
});
