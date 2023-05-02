let data = document.querySelectorAll(".counter")
let dataArray = Array.from(data)

dataArray.map((data) => {
    let count = 0
    let counterUp = () => {
        count++
        data.innerHTML = count
        if (count == data.dataset.number) {
            clearInterval(stopInterval)
        }
    }
    let stopInterval = setInterval(counterUp, 30)
})

let dataLarge = document.querySelectorAll(".counter-large")
let dataArrayLarge = Array.from(dataLarge)

dataArrayLarge.map((dataLarge) => {
    let count = 0
    let counterUp = () => {
        count += 2000
        dataLarge.innerHTML = count
        if (count == dataLarge.dataset.number) {
            clearInterval(stopInterval)
        }
    }
    let stopInterval = setInterval(counterUp, 30)
})