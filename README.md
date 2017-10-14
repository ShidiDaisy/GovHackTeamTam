# GovHackTeamTam
GovHack 2017 Project - Dream Location
"Dream Location" is a data analysis and data visualization project. It focuses on finding the most liveability place based on different preference from users in Queensland. 

We are team TAM in GovHack 2017, we are here to talk about our project Dream Location. Australia attracts tourists, backpackers, and international students every year. Dream Location is a multi-functional and friendly-to-use system which can recommend an optimal location to live based on your personal preferences. 

Not only the crime data but also the vertex coordinates of each suburb are provided in the criminal record from govData. To obtain more detailed and reliable data, we utilize google earth API to retrieve a large amount of location data. With the vertex coordinates, a suburb can be visualized and a point can be determined whether is inside of this suburb by applying crossing number algorithm. This is essential to build the relationship between suburbs and public infrastructures. The livability algorithm is another significant creation in our project, which is used to evaluated whether a place is suitable for a client given his or her preferences.

In this system, what we can do is looking for labels which you are concerned about, such as shopping mall, wifi spots, parking lots, then pick it as an evaluation standard by simply dragging it into a specified box. After that, our system will show the recommended location for you. Finally, it is time to enjoy your life. Our project also generates some “side-effects”. Through the analysis of our data, we have found some useful information. For example, the statistic data shows that these regions have higher crime rate, which indicates that it might be better to arrange more police here. Those regions have relatively sparse shopping mall distribution, therefore, these features can be helpful if the local government is planning to build a new shopping center.

In addition, we build our own algorithm: "Happiness Score Algorithm", "Find the center point of any kinds of polygon algorithm", to find the best location/suburb to live for different kinds of user.

For Happiness Algorithm, we give the weight to the attributes that user care about and calculate the suburb with the highest happiness score, which means this suburb is most suitable for this user.

For "Point in the center algorithm", we build the algorithm that can easily find the center point of any kinds of the polygon, so that we can put the marker of the center of any suburbs, which provides better data visualization.

To browse our project(website), just download all files from our repository, and open the index.html
