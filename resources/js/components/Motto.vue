<template>
  <div :class="classname">
    <div
      class="col-md-6"
      style="
        background: white;
        padding: 8rem;
        border-radius: 100rem;
        width: 20%;
        border: 1rem solid #363635;
        position: relative;
        transition: 2s all ease;
      "
        :style="styleParent"
    >
      <div
        role="button"
        @click="
          motto = 'Vision';
          changeMotto();
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
          align-items: left;
          /* justify-content: center; */
          top: -40px;
          right: 30px;
          transition: 5s all ease;
        "
        :style="styleVision"
      >
        Vision
      </div>
      
      <div
        role="button"
        @click="
          motto = 'Mission';
          changeMotto();
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
          align-items: left;
          /* justify-content: center; */
          bottom: 75px;
          left: -55px;
          transition: 5s all ease;
        "
        :style="styleMission"
        
      >
        Mission
    </div>      

      <div
        role="button"
        @click="
          motto = 'Value';
          changeMotto();
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
          align-items: left;
          /* justify-content: center; */
          bottom: -31px;
          right: 8px;
          transition: 5s all ease;
        "
        :style="styleValue"
      >
        Value
      </div>
    </div>
    <div class="col-md-6" v-if="this.motto == 'Value'">
      <div v-html="$root.setting['value_about_us']"></div>
    </div>
    <div class="col-md-6" v-if="this.motto == 'Mission'">
      <div class="col-md-8">
        <div v-html="$root.setting['misi_about_us']"></div>
      </div>
    </div>
    <div class="col-md-6" v-if="this.motto == 'Vision'">
      <div class="col-md-8">
        <div v-html="$root.setting['visi_about_us']"></div>
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
      classname: "row justify-content-left container",
      styleVision: '',
      styleMission: '',
      styleValue: '',
      styleParent: '',
      widthSize: '',
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
    changeMotto() {
        switch(this.motto) {
            case 'Vision' :
            if(this.widthSize < 770) {
                this.classname = "row justify-content-md-end justify-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20";
                this.styleVision = "transform: rotate(202deg)";
                this.styleMission = "transform: rotate(200deg)";
                this.styleValue = "transform: rotate(200deg)";
                this.styleParent = "transform: rotate(160deg)";
            }else {
                this.classname = "row justify-content-md-end justify-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20";
                this.styleVision = "transform: rotate(290deg)";
                this.styleMission = "transform: rotate(291deg)";
                this.styleValue = "transform: rotate(294deg)";
                this.styleParent = "transform: rotate(70deg)";
            }
            break;
            case "Mission":
            if(this.widthSize < 770) {
                this.classname = "row left-content-md-end justify-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20";
                this.styleVision = "transform: rotate(90deg)";
                this.styleMission = "transform: rotate(90deg)";
                this.styleValue = "transform: rotate(90deg)";
                this.styleParent = "transform: rotate(269deg)";
            }else {
                this.classname = "row left-content-md-end left-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20";

                this.styleVision = "transform: rotate(192deg)";
                this.styleMission = "transform: rotate(189deg)";
                this.styleValue = "transform: rotate(189deg)";
                this.styleParent = "transform: rotate(170deg)";
            }
            break
            case "Value" :
            if(this.widthSize < 770) {
                this.classname = "row left-content-md-end left-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20";
                this.styleVision = "transform: rotate(329deg)";
                this.styleMission = "transform: rotate(326deg)";
                this.styleValue = "transform: rotate(330deg)";
                this.styleParent = "transform: rotate(32deg)";
            }else {
                this.classname = "row left-content-md-end left-content-left align-items-center gap-5 translateX-100% v-slide-x-transition=20";
                this.styleVision = "transform: rotate(57deg)";
                this.styleMission = "transform: rotate(58deg)";
                this.styleValue = "transform: rotate(54deg)";
                this.styleParent = "transform: rotate(304deg)";
            }
            break      
         
        }

    },
    
    
    updateWindowWidth() {
      this.widthSize = window.innerWidth;
    }
  },

};


</script>
