        const menuLinks = document.querySelectorAll('nav button')
      

        menuLinks.forEach((menuLink,index) => {
          menuLink.addEventListener("click", (e) => {
                menuLinks.forEach(otherEntity => {
                    otherEntity.style.color = "#373737"
                })
                menuLink.style.color = "#1162db"
            })
        })

        


       



