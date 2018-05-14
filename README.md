[![Telegram](https://img.shields.io/badge/Telegram-PresentKim-blue.svg?logo=telegram)](https://t.me/PresentKim)

[![icon/192x192](meta/icon/192x192.png?raw=true)]()

[![License](https://img.shields.io/github/license/PMMPPlugin/GaitSpeed.svg?label=License)](LICENSE)
[![Release](https://img.shields.io/github/release/PMMPPlugin/GaitSpeed.svg?label=Release)](https://github.com/PMMPPlugin/GaitSpeed/releases/latest)
[![Download](https://img.shields.io/github/downloads/PMMPPlugin/GaitSpeed/total.svg?label=Download)](https://github.com/PMMPPlugin/GaitSpeed/releases/latest)


A plugin modify player's speed for PocketMine-MP

## Command
Main command : `/gaitspeed <default | set | list | lang | reload | save>`

| subcommand | arguments                         | description             |
| ---------- | --------------------------------- | ----------------------- |
| Default    | \<speed percent\>                 | Set default gait speed  |
| Set        | \<player name\> \<speed percent\> | Set player's gait speed |
| List       | \[page\]                          | Show gait speed list    |
| Lang       | \<language prefix\>               | Load default lang file  |
| Reload     |                                   | Reload all data         |
| Save       |                                   | Save all data           |




## Permission
| permission            | default  | description        |
| --------------------- | -------- | ------------------ |
| gaitspeed.cmd         | OP       | main command       |
|                       |          |                    |
| gaitspeed.cmd.default | OP       | default subcommand |
| gaitspeed.cmd.set     | OP       | set  subcommand    |
| gaitspeed.cmd.list    | OP       | list subcommand    |
| gaitspeed.cmd.view    | OP       | view subcommand    |
| gaitspeed.cmd.lang    | OP       | lang subcommand    |
| gaitspeed.cmd.reload  | OP       | reload subcommand  |
| gaitspeed.cmd.save    | OP       | save subcommand    |




## ChangeLog
### v1.0.0 [![Source](https://img.shields.io/badge/source-v1.0.0-blue.png?label=source)](https://github.com/PMMPPlugin/GaitSpeed/tree/v1.0.0) [![Release](https://img.shields.io/github/downloads/PMMPPlugin/GaitSpeed/v1.0.0/total.png?label=download&colorB=1fadad)](https://github.com/PMMPPlugin/GaitSpeed/releases/v1.0.0)
- First release
  
  
---
### v1.0.2 [![Source](https://img.shields.io/badge/source-v1.0.2-blue.png?label=source)](https://github.com/PMMPPlugin/GaitSpeed/tree/v1.0.2) [![Release](https://img.shields.io/github/downloads/PMMPPlugin/GaitSpeed/v1.0.2/total.png?label=download&colorB=1fadad)](https://github.com/PMMPPlugin/GaitSpeed/releases/v1.0.2)
- \[Fixed\] get player my name error
  
  
---
### v1.0.3 [![Source](https://img.shields.io/badge/source-v1.0.3-blue.png?label=source)](https://github.com/PMMPPlugin/GaitSpeed/tree/v1.0.3) [![Release](https://img.shields.io/github/downloads/PMMPPlugin/GaitSpeed/v1.0.3/total.png?label=download&colorB=1fadad)](https://github.com/PMMPPlugin/GaitSpeed/releases/v1.0.3)
- \[Fixed\] loadClaas error
- \[Fixed\] db error
  
  
---
### v1.1.0 [![Source](https://img.shields.io/badge/source-v1.1.1-blue.png?label=source)](https://github.com/PMMPPlugin/GaitSpeed/tree/v1.1.0) [![Release](https://img.shields.io/github/downloads/PMMPPlugin/GaitSpeed/v1.1.0/total.png?label=download&colorB=1fadad)](https://github.com/PMMPPlugin/GaitSpeed/releases/v1.1.0)
- \[Changed\] Remove return type hint
- \[Fixed\] Not use sqlite
  
  
---
### v1.2.0 [![Source](https://img.shields.io/badge/source-v1.2.0-blue.png?label=source)](https://github.com/PMMPPlugin/GaitSpeed/tree/v1.2.0) [![Release](https://img.shields.io/github/downloads/PMMPPlugin/GaitSpeed/v1.2.0/total.png?label=download&colorB=1fadad)](https://github.com/PMMPPlugin/GaitSpeed/releases/v1.2.0)
- \[Fixed\] main command config error
- \[Changed\] Change permisson name
- \[Changed\] Command & Translation refactoring
  
  
---
### v1.2.1 [![Source](https://img.shields.io/badge/source-v1.2.1-blue.png?label=source)](https://github.com/PMMPPlugin/GaitSpeed/tree/v1.2.1) [![Release](https://img.shields.io/github/downloads/PMMPPlugin/GaitSpeed/v1.2.1/total.png?label=download&colorB=1fadad)](https://github.com/PMMPPlugin/GaitSpeed/releases/v1.2.1)
- \[Fixed\] Violation of PSR-0
- \[Changed\] Add return type hint
- \[Changed\] Rename main class to GaitSpeed
  
  
---
### v1.2.2 [![Source](https://img.shields.io/badge/source-v1.2.2-blue.png?label=source)](https://github.com/PMMPPlugin/DustBin/tree/v1.2.2) [![Release](https://img.shields.io/github/downloads/PMMPPlugin/DustBin/v1.2.2/total.png?label=download&colorB=1fadad)](https://github.com/PMMPPlugin/DustBin/releases/v1.2.2)
- \[Added\] Add PluginCommand getter and setter
- \[Added\] Add getters and setters to SubCommand
- \[Fixed\] Add api 3.0.0-ALPHA11
- \[Added\] Add website and description
- \[Changed\] Show only subcommands that sender have permission to use
