    // let popup = document.querySelector(".popup");
    let popupsMain = document.querySelector("#main-popups");
    let popupConfirm = document.querySelector("#pop-confirm");
    let msgConfirm = document.querySelector("#p-confirm");
    let onEditId;

    let popYes = document.querySelector("#pop-add");

    let popNo = document.querySelector("#pop-cancel");
    popNo.addEventListener("click", function() {
        popupConfirm.style.visibility = "hidden";
        popupConfirm.style.display = "none";
        // popupsMain.style.display = "none";
        // disableAllOthers(onEditId);
    })

    /*
        When click on action button "X" on a line: 
            - display the line's id on msgConfirm
            - change confirm popup visibity for visible.
            - recover the submit button "suppr" of the line by id
                -> when click on the "yes" button, that call the onclick event of the "suppr" submit button: the line is deleted
                -> when click on the "no" button, that call the onclick event of the "cancel" submit
    */
    function displayHiddePopupConfirm(txt, qSelector, opId) {
        popupConfirm.childNodes[1].textContent = txt;
        onEditId = opId;

        popupConfirm.style.display = popupConfirm.style.display == 'flex' ? 'none' : 'flex'; 
        popupConfirm.style.visibility = popupConfirm.style.visibility =='visible' ? 'hidden' : 'visible';
        let target = document.querySelector(qSelector);
        popYes.addEventListener("click", function() {
            target.click();
        })
    }
    
    /*
        When click on the EDIT button of a line
            - passing line id via parameter
                - if bool isOn is true:
                    - call addClassNameOnEditAndAble(id), that add the className "on-edit" at line
                - else is false:
                    - call removeClassNameOnEditAndDisable() that remove "on-edit" of element className list
                - finally:
                    - made appear confirm and cancel buttons by switch their visibility hidden<->visible by call switchActionsButtonsHidden(id)
                    - made disabled true for buttons of the other lines by call disableAllOthers(id)
    */
    function switchEditModeForLine(id, isOn) {
        let bool = true;
        if(isOn != false) {
            onEditId = id;
            addClassNameOnEditAndAble(id);
        }
        else {
            bool = false;
            removeClassNameOnEditAndDisable();
        }
        switchActionsButtonsHidden(id);
        disableAllOthers(id, bool);
    }

    /*
        get elements child's of the line that is not a submit button (inputs, select..) and return them on an array
    */
        function getLineChilds(id) {
            let sel = ".tr" + id;
            let line = document.querySelector(sel);
    
            let elements = [];
            line.childNodes.forEach(c => {
                c.childNodes.forEach(cc => {
                    if(cc.type !== "submit") {
                        elements.push(cc);
                    }
                })
            })
            return elements;
        }

    /*
        make available edition of inputs and selects of the line 
    */
    function addClassNameOnEditAndAble(id) {
        let elements = getLineChilds(id);
        elements.forEach(elt => {
            elt.className += " on-edit";
            elt.className = !elt.className.includes("on-edit") ? elt.className + " on-edit" : elt.className;
            elt.disabled = false;
            console.log(elt.tagName);

            if(elt.tagName == "INPUT" || elt.tagName == "SELECT") {
                elt.style.backgroundColor = "white";
            }
        });
    }

    /*
        made appear buttons CONFIRM and CANCEL on the line and disappear EDIT and X buttons
    */
    function switchActionsButtonsHidden(id) {
        let hiddens = document.querySelectorAll('[class*="appear-on-edit"]');
        hiddens.forEach(hidde => {
            if(hidde.id.includes(id) && !hidde.id.includes("sub-suppr-" + id)) {
                hidde.hidden = !hidde.hidden;
            }
        })
    }

    /*
        disable EDIT and X buttons for others lines while a line where in edit mode
    */
    function disableAllOthers(id, bool) {
        let btn = document.querySelectorAll("input[type='submit']");
        btn.forEach(b => {
            if(!b.id.includes(id)) {
                b.disabled = bool !== false ? true : false;
            }
        })
    }

    /*
        remove the className "on-edit" for all elements that contains it, and makes them disabled 
    */
    function removeClassNameOnEditAndDisable() {
        let elements = document.querySelectorAll(".on-edit");
        elements.forEach(elt => {
            elt.className = elt.className.includes("on-edit") ? elt.className.replace("on-edit", "") : elt.className;
            elt.disabled = true;

            if(elt.tagName == "INPUT" || elt.tagName == "SELECT") {
                elt.style.backgroundColor = "";
            }
        })
    }


