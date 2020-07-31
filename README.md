# File Manager

### Reikės dokerio
Parsisiunčiate ir įsidiegiate įrankį iš [čia](https://docs.docker.com/engine/install/). Windows OS `docker-compose` įsidiegia su dockerio install'u.


Jeigu naudojate MacOS arba Linux, parsisiunčiate ir įsidiegiate `docker-compose` iš [čia](https://github.com/docker/compose/releases).


### Projekto paleidimas

```bash
  $ git clone <project>
  $ cd path/to/<project>
  $ docker-compose up -d
```
### Kaip pamatyti kas atsitiko?
Atsidarote naršyklę ir einate į 
```bash
http://127.0.0.1:8080
```
### Kaip išjungti?

```bash
  $ cd path/to/<project>
  $ docker-compose down
```


### Dėl virtualizacijos įjungimo

[Hyper-V įjungimas](https://docs.microsoft.com/en-us/virtualization/hyper-v-on-windows/quick-start/enable-hyper-v#enable-hyper-v-using-powershell)

[BIOS virtualizacija](https://www.bleepingcomputer.com/tutorials/how-to-enable-cpu-virtualization-in-your-computer-bios/)
