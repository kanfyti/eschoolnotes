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
    row.cells[3].innerHTML = currNote

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
    console.log(sumOfNotes + " " + sumOfCoeff)

    row.cells[1].innerText = sumOfNotes
    row.cells[2].innerText = sumOfCoeff
    row.cells[3].innerText = (sumOfNotes / sumOfCoeff).toFixed(2)

    noteDiv.remove()
}