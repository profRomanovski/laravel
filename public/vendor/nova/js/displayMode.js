window.addEventListener('load', () => {
    let isDisplayMode = document.cookie
        .split('; ')
        .find(row => row.startsWith('isDisplayMode'))

    if (isDisplayMode?.split('=')[1] === 'true') {
        document.querySelector('.content').classList.toggle('display-mode')
        document.querySelector('.w-sidebar').classList.toggle('display-mode')

        document.querySelector('input.display-input').checked = true
    }

    document.querySelector('.display input[type="checkbox"]')
        .addEventListener('change', event => {
            document.querySelector('.content').classList.toggle('display-mode')
            document.querySelector('.w-sidebar').classList.toggle('display-mode')

            document.cookie = `isDisplayMode=${event.target.checked}`
        })


    let reloadInterval = createInterval(window.location.pathname.toString(), 5)

    history.pushState = ((a, b, destination) => {
        if (reloadInterval) {
            clearInterval(reloadInterval)
        }

        reloadInterval = createInterval(destination, 5)
    })
})

function createInterval(destination, minute) {
    if (destination.includes('tracklist-resources')) {
        return setInterval(() => {
            let location = window.location
            window.location = `${window.origin}/nova/dashboards/main`
            window.location = location
        }, minute * 60 * 1000)
    }
}
