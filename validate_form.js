function isCorrect() {
        //border="1" cellpadding="10" cellspacing="0" width="100%"
        let val_y = document.getElementById("y")
        let val_r = document.getElementById("r")
        document.getElementById('err_y').innerHTML = ""
        document.getElementById('err_r').innerHTML = ""
        document.getElementById('err_range').innerHTML = ""
        if (val_y.value.match(/^-?\d+[.,]?\d*$/) == null){
                document.getElementById('err_y').innerHTML = "бедному игорю (y) тоже досталось"

        }
        if (val_r.value.match(/^-?\d+[.,]?\d*$/) == null){
                document.getElementById('err_r').innerHTML =  "как можно было испортить радиус"
        }
        let isOk = (val_y.value.match(/^-?\d+[.,]?\d*$/) != null &&
            val_r.value.match(/^-?\d+[.,]?\d*$/) != null)
        if (isOk) {
                val_y.value = val_y.value.replace(",",".")
                val_r.value = val_r.value.replace(",",".")
                let numY = Number(val_y.value)
                let numR = Number(val_r.value)
                let count = 0;

                if (numR > 2 && numR < 5){
                        count++;
                }else document.getElementById('err_r').innerHTML = "там на графике есть диапазон кста"
                if (numY > -3 && numY < 5){
                        count++;
                } else document.getElementById('err_y').innerHTML = "тебе видимо зашёл видос, но" +
                    " обрати внимание и на график"



                if (count == 2) {
                        return true
                }
        }else{
                document.getElementById('err_range').innerHTML = "мне лень проверять диапазон, у Вас формат " +
                    "неверный даже"
        }
        return false
}