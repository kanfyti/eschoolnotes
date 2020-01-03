    function addNote(obj) {
    let subjects = new Array('Mathematic', 'Biology', 'Geography', 'Geometry', 
    'English', 'Informatics', 'History', 'Literature', 'OBSH',
    'Society', 'Russian Language', 'Physic', 'Physical Education', 
    'Chemistry');

    let subject = $('#subject')[0].value
    let note = $('#note')[0].value * 1
    let coeff = $('#coeff')[0].value * 1.0

    let row = $('#subject-row-' + subjects.indexOf(subject))[0]
    
    let currSumOfNote = row.cells[1].innerHTML * 1.0
    currSumOfNote += note * coeff
    row.cells[1].innerHTML = currSumOfNote 

    let currSumOfCoeff = row.cells[2].innerHTML * 1.0
    currSumOfCoeff += coeff
    row.cells[2].innerHTML = currSumOfCoeff 

    let currNote = (currSumOfNote / currSumOfCoeff).toFixed(2)
    makeDifference(row, currNote)

    let div = row.cells[4].children[0]
    let addNote = document.createElement('div')
    addNote.className = 'note'
    addNote.onclick = deleteNote
    addNote.innerHTML = "<p style='font-size: 1rem'>" + note + "</p>" + "<p style='font-size: 0.75rem'>" + coeff + "</p>"
    div.appendChild(addNote)
}

function deleteNote(obj) {
    let noteDiv = obj.target.parentElement
    let addNote = noteDiv.children[0].innerText * 1
    let addCoeff = noteDiv.children[1].innerText * 1.0
    let row = noteDiv.parentElement.parentElement.parentElement
    console.log(noteDiv)

    let sumOfNotes = row.cells[1].innerText * 1.0 - addNote * addCoeff
    let sumOfCoeff = row.cells[2].innerText * 1.0 - addCoeff
    let currNote = (sumOfNotes / sumOfCoeff).toFixed(2)
    makeDifference(row, currNote)

    row.cells[1].innerHTML = sumOfNotes
    row.cells[2].innerHTML = sumOfCoeff

    noteDiv.remove()
}

function makeDifference(row, currNote) {
    let pText = row.cells[3].children[0].innerHTML
    let diff = 0.0
    if (pText.length == 4) {
        diff = (currNote - pText).toFixed(2)
    } else {
        let tableNote = pText.substring(0, 4) * 1.0
        diff = (pText.substring(pText.indexOf('(')+1, pText.indexOf(')')) * 1.0 + (currNote - tableNote)).toFixed(2)
    } 
    if (diff > 0) {
        row.cells[3].innerHTML = "<p class='more'>" + currNote + " (+" + diff + ")" + "</p>"
    } else if (diff < 0) {
        row.cells[3].innerHTML = "<p class='less'>" + currNote + " (" + diff + ")" + "</p>"
    } else {
        row.cells[3].innerHTML = "<p>" + currNote + "</p>"
    }
}