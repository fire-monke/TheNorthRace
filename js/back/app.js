        const menuLinks = document.querySelectorAll('nav a')
      

        menuLinks.forEach((menuLink,index) => {
          menuLink.addEventListener("click", (e) => {
                menuLinks.forEach(otherEntity => {
                    otherEntity.style.color = "#373737"
                })
                menuLink.style.color = "#1162db"
                console.log("dsfdsf");
                e.preventDefault()
            })
        })

        


       



