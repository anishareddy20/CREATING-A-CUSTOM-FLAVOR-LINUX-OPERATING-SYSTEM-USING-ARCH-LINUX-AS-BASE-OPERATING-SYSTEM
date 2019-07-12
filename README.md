# CREATING-A-CUSTOM-FLAVOR-LINUX-OPERATING-SYSTEM-USING-ARCH-LINUX-AS-BASE-OPERATING-SYSTEM
There are many Linux distros (operating systems) available on internet which are targeted for different users like standard users, developers, penetration testers, and sysadmins. But it’s very difficult to create own flavor of operating system for anyone because it is a very complicated to compile the source code from scratch. Arch Linux OS installation process is difficult because it doesn’t have a graphical interface. This process is done by command line and consists of using a guide like Arch Wiki to partition your drive, install a minimal base system, and go through each command and configuration file to get things set up, we are using arch Linux as the base operating system for building custom Linux distro. What we are doing is creating a website which lists all software’s and users can select everything like bootloader (Grub or LILO), kernel, browsers, desktop managers, windows managers etc. After selecting everything on the website, it generates a shell script which will automatically installs the all selected tools from network using Arch Linux repos. Arch Linux is an independently developed, x86-64 general-purpose GNU/Linux distribution that strives to provide the latest stable versions of most software by following a rolling-release model. The default installation is a minimal base system, configured by the user to only add what is purposely required. The principles of this Arch Linux OS are Simplicity, Modernity, Pragmatism, User centrality, Versatility. Source-based distributions are highly portable, giving the advantage of controlling and compiling the entire OS and applications for a machine architecture and usage scheme, with the disadvantage of the time-consuming nature of source compilation. The Arch base and all packages are only compiled for the x86_64 architecture. Arch Linux is not for Linux beginners. there's a lot of manual configuration and command line work involved that Linux rookies probably aren't comfortable with.Users can customize every part of OS just by selecting them on website. We can use these builds on dockers also for deploying web applications. SUSE Studio don’t have options for selecting bootloader and other applications.


SYSTEM REQUIREMENTS
Hardware requirements
       The hardware requirements may serve as the basis for a contract for the implementation of the system and should therefore be a complete and consistent specification of the whole system. They are used by software engineers as the starting point for the system design. It shows what the system does and not how it should be implemented.
Minimum 8GB RAM
1Ghz processor (Multi processor recommend)

Software requirements
          The software requirements document is the specification of the system. It should include both a definition and a specification of requirements. It is a set of what the system should do rather than how it should do it. The software requirements provide a basis for creating the software requirements specification.  It is useful in estimating cost, planning team activities, performing tasks and tracking the team’s and tracking the team’s progress throughout the development activity.
Arch Linux Operating System
PHP Server
Arch repository
Arch Linux minimal base ISO image

Modules
    Script generator
         Script generator automatically processes the user selections and generates installation script.
   Client-side logs window
         Console window on client side displays server-side operations live.
    Automated ISO builder
         ISO builder generates installable OS image for user.
