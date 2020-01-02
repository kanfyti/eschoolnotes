function addNote(obj) {
    let subject = $('#subject')[0].value
    let note = $('#note')[0].value * 1
    let coeff = $('#coeff')[0].value * 1.0

    let row = $('#row-' + subject)[0]
    
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
    addNote.innerHTML = "<p>" + note + "</p>" + "<p style='font-size: 8pt'>" + coeff + "</p>"
    div.appendChild(addNote)
    console.log(div)
}