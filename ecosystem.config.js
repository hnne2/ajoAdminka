module.exports = {
  apps: [
    {
      name: "yii-admin",
      script: "php",
      args: "yii serve --port=3003", 
      cwd: "/home/limkorm-check-bot/ajoAdminka",
      interpreter: "none",
      watch: false
    }
  ]
};

