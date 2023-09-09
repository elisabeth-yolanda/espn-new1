<template>
    <div class="row align-items-center gap-md-0 gap-3 " style="position: relative;">
        <div class="col-md-12 col-lg-5">
            <!-- Content for the second column -->
        </div>
        <div class="col-md-12 col-lg-2 d-flex flex-column align-items-center">
            <div class="ring justify-end" @click="moveRing" :style="styleParent">
                <div
                    role="button"
                    @click="
          motto = 'Vision';
          moveRing();
        "
                    style="
          position: absolute;
          background: #f2af2d;
          border-radius: 20rem;
          width: 40%;
          height: 40%;
          font-size: 21px;
          font-weight: 700;
          color: white;
          display: flex;
          align-items: center; /* Vertically center the text */
          justify-content: center; /* Horizontally center the text */
          top: -40px;
          right: 30px;
          transition: 3s all ease;
        "
                    :style="styleVision"
                >
                    Vision
                </div>

                <div
                    role="button"
                    @click="
          motto = 'Mission';
          moveRing();
        "
                    style="
          position: absolute;
          background: #ec283a;
          border-radius: 20rem;
          width: 40%;
          height: 40%;
          font-size: 21px;
          font-weight: 700;
          color: white;
          display: flex;
          align-items: center;
          justify-content: center;
          bottom: 75px;
          left: -55px;
          transition: 3s all ease;
        "
                    :style="styleMission"

                >
                    Mission
                </div>

                <div
                    role="button"
                    @click="
          motto = 'Value';
          moveRing();
        "
                    style="
          position: absolute;
          background: #63b645;
          border-radius: 20rem;
          width: 40%;
          height: 40%;
          font-size: 21px;
          font-weight: 700;
          color: white;
          display: flex;
          align-items: center;
          justify-content: center;
          bottom: -31px;
          right: 8px;
          transition: 3s all ease;
        "
                    :style="styleValue"
                >
                    Value
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-5">
            <div class="col-md-12" id="infoText">
                <div v-if="motto === 'Value'">
                    <div v-html="$root.setting['value_about_us']"></div>
                </div>
                <div v-else-if="motto === 'Mission'">
                    <div class="col-md-12">
                        <div v-html="$root.setting['misi_about_us']"></div>
                    </div>
                </div>
                <div v-else-if="motto === 'Vision'">
                    <div class="col-md-12">
                        <div v-html="$root.setting['visi_about_us']"></div>
                    </div>
                </div>
                <div v-else>
                    <p>No Data</p>
                    <p>Default Content</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Motto",
    data() {
        return {
            motto: null,
            classname: "row justify-content-center container",
            styleVision: '',
            styleMission: '',
            styleValue: '',
            styleParent: '',
            widthSize: '',
            styleText: 'margin-bottom: 0.4rem',
            isInfoTextVisible: false,
        };
    },
    mounted() {
        this.updateWindowWidth();
        window.addEventListener("resize", this.updateWindowWidth);
    },
    beforeDestroy() {
        window.removeEventListener("resize", this.updateWindowWidth);
    },
    methods: {
        // changeMotto() {
        //     switch(this.motto) {
        //         case 'Vision':
        //             this.classname = this.widthSize < 770
        //                 ? "row justify-content-end container justify-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20s"
        //                 : "row justify-content-end container justify-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20s";
        //             this.styleVision = this.widthSize < 770
        //                 ? "transform: rotate(202deg)"
        //                 : "transform: rotate(290deg)";
        //             this.styleMission = this.widthSize < 770
        //                 ? "transform: rotate(200deg)"
        //                 : "transform: rotate(291deg)";
        //             this.styleValue = this.widthSize < 770
        //                 ? "transform: rotate(200deg)"
        //                 : "transform: rotate(294deg)";
        //             this.styleParent = this.widthSize < 770
        //                 ? "transform: rotate(160deg)"
        //                 : "transform: rotate(70deg)";
        //             break;
        //         case "Mission":
        //             this.classname = this.widthSize < 770
        //                 ? "row justify-content-end container justify-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20s"
        //                 : "row justify-content-end container justify-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20s";
        //             this.styleVision = this.widthSize < 770
        //                 ? "transform: rotate(90deg)"
        //                 : "transform: rotate(192deg)";
        //             this.styleMission = this.widthSize < 770
        //                 ? "transform: rotate(90deg)"
        //                 : "transform: rotate(189deg)";
        //             this.styleValue = this.widthSize < 770
        //                 ? "transform: rotate(90deg)"
        //                 : "transform: rotate(189deg)";
        //             this.styleParent = this.widthSize < 770
        //                 ? "transform: rotate(269deg)"
        //                 : "transform: rotate(170deg)";
        //             break;
        //         case "Value":
        //             this.classname = this.widthSize < 770
        //                 ? "row justify-content-end container justify-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20s"
        //                 : "row justify-content-end container justify-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20s";
        //             this.styleVision = this.widthSize < 770
        //                 ? "transform: rotate(329deg)"
        //                 : "transform: rotate(57deg)";
        //             this.styleMission = this.widthSize < 770
        //                 ? "transform: rotate(326deg)"
        //                 : "transform: rotate(58deg)";
        //             this.styleValue = this.widthSize < 770
        //                 ? "transform: rotate(330deg)"
        //                 : "transform: rotate(54deg)";
        //             this.styleParent = this.widthSize < 770
        //                 ? "transform: rotate(32deg)"
        //                 : "transform: rotate(304deg)";
        //             break;
        //     }
        // },
        moveRing() {
            const ring = document.querySelector(".ring");
            const text = document.querySelector("#infoText");
            switch (this.motto) {
                case 'Vision':
                    ring.style.transform = this.widthSize < 770
                        ? "rotate(90deg)"
                        : "translate(-73%, 0%) rotate(60deg)";
                    this.styleVision = this.widthSize < 770
                        ? "transform: rotate(269deg); left: 80%; top: 27%;"
                        : "transform: rotate(300deg)";
                    this.styleMission = this.widthSize < 770
                        ? "transform: rotate(269deg); left: 10%; bottom: 75%;"
                        : "transform: rotate(300deg)";
                    this.styleValue = this.widthSize < 770
                        ? "transform: rotate(269deg); right: 55%; bottom: -15%;"
                        : "transform: rotate(300deg)";
                    text.style.transform = this.widthSize < 770
                        ? "translate(0%, 35%)"
                        : "translate(-23%, -23%)";
                    break;
                case "Mission":
                    ring.style.transform = this.widthSize < 770
                        ? "translate(0%, 0%) rotate(-90deg)"
                        : "translate(-73%, 0%) rotate(170deg)";
                    this.styleVision = this.widthSize < 770
                        ? "transform: rotate(90deg)"
                        : "transform: rotate(190deg)";
                    this.styleMission = this.widthSize < 770
                        ? "transform: rotate(90deg)"
                        : "transform: rotate(189deg)";
                    this.styleValue = this.widthSize < 770
                        ? "transform: rotate(90deg)"
                        : "transform: rotate(189deg)";
                    text.style.transform = this.widthSize < 770
                        ? "translate(0%, 15%)"
                        : "translate(-23%, -23%)";
                    break;
                case "Value":
                    ring.style.transform = this.widthSize < 770
                        ? "translate(0%, 0%) rotate(90deg)"
                        : "translate(-73%, 0%) rotate(290deg)";
                    this.styleVision = this.widthSize < 770
                        ? "transform: rotate(270deg); top: -15%; right: 55%;"
                        : "transform: rotate(70deg)";
                    this.styleMission = this.widthSize < 770
                        ? "transform: rotate(270deg); bottom: -15%; left: 5%"
                        : "transform: rotate(70deg)";
                    this.styleValue = this.widthSize < 770
                        ? "transform: rotate(270deg); bottom: 30%; right: -20%;"
                        : "transform: rotate(70deg)";
                    text.style.transform = this.widthSize < 770
                        ? "translate(0%, 15%)"
                        : "translate(-23%, -23%)";
                    break;
            }

            setTimeout(() => {
                const infoText = document.getElementById("infoText");
                if (infoText.style.display === "none" || infoText.style.display === "") {
                    infoText.style.display = "block";

                    // Set a delay before fading in the text
                    setTimeout(() => {
                        infoText.style.opacity = "1";
                    }, 10);
                }
            }, 2000);
        },
        updateWindowWidth() {
            this.widthSize = window.innerWidth;
        }
    },
};
</script>
