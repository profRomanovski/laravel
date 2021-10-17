window.addEventListener('load', () => {
  let dayOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']

  Array.from(document.querySelectorAll('table[data-testid="resource-table"] > thead th > span'))
    .map(str => {
      if(!isNaN(Date.parse(str.innerHTML))){
        str.innerHTML = dayOfWeek[new Date(str.innerHTML).getDay()] + `<br> ${str.innerHTML}`
      }
      return str
    })
})
