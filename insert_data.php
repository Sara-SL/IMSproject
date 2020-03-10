<?php
include("connectDB.php");

$sql = "SET FOREIGN_KEY_CHECKS = 0;";
mysqli_query($link, $sql);

    //--------------------------------------------------------
    //----------- insert into the Traits table ---------------
    //--------------------------------------------------------
    $sql = "Insert into Traits (id, question)
        values
        (37,'Always worry too long after embarrassment?'),(36,'Are you employed now?'),
        (35,'Are you now used to getting up early in morning?'),(53,'Are you on a diet'),
        (34,'Are you satisfied with your own health?'),(39,'BMI higher than 25?'),
        (52,'Do you build up?'),(33,'Do you consider walking a pleasure?'),
        (51,'Do you consider yourself a fast walker?'),(56,'Do you cycle as daily transport?'),
        (32,'Do you drink alcohol from time to time?'),(49,'Do you drink alcohol?'),
        (54,'Do you eat all of eggs, dairy, wheat and sugar daily?'),
        (31,'Do you feel hated by family member as a child?'),
        (30,'Do you frequently use solarium or sunlamp?'),
        (29,'Do you have a Bachelar Degree or equivalent?'),
        (40,'Do you have any diseases of the nervous system?'),
        (28,'Do you have any mouth or teeth dental problems?'),
        (27,'Do you have extrodinary poor eye sight or other eye problems?'),
        (26,'Do you have frequent mood swings?'),(25,'Do you have fresh fruit intake everyday?'),
        (24,'Do you have hearing difficulties or problems?'),
        (42,'Do you have leg pain after 10 min\'s walk?'),
        (23,'Do you have long-term diseases in digestive system?'),
        (22,'Do you have siblings who has ever been diagnosised depression?'),
        (21,'Do you have trouble falling asleep, or sleeping more than 10h/day?'),
        (20,'Do you intake vitamin or mineral supplements as routine?'),
        (19,'Do you live alone?'),(18,'Do you own vehicles?'),
        (17,'Do you own your housing?'),(16,'Do you prefer semi-skimmed milk than other types of milk?'),
        (15,'Do you smoke currently?'),(47,'Do you spend more than 3 hours a day watching TV?'),
        (45,'Do you suffer from arthrosis of knee?'),(14,'Do you suffer from chest pain from time to time?'),
        (13,'Do you usually drive faster than motorway speed limit?'),
        (41,'Does any of your siblings have heart disease? (choose no if you don\'t have a sibling)'),
        (38,'Does any one of your parents or siblings have been diagnosised as Diabetes?'),
        (50,'Does your job involves shifting?'),(46,'Ever had osteoarthritis (pain in bone joints)?'),
        (12,'Frequently exposed to LOUD MUSIC?'),
        (11,'Have you ever experienced frequent headache over a month or do you have migraine?'),
        (10,'Have you ever experienced tinnitus?'),(43,'Have you ever had cholelithiasis before?'),
        (9,'Have you experienced stomach or abdominal pain in last month?'),
        (8,'Have you felt pain in your back or shoulder in last month?'),
        (55,'Have you given birth in last 5 years?'),
        (7,'Have you had any physical exercise in last 4 weeks?'),
        (6,'Have you noticed your change of speed in moving or speaking?'),
        (44,'Have you smoked before?'),
        (5,'Is particulate air pollution (pm2.5) a problem in your city or living area?'),
        (48,'Is your work place very cold?'),(4,'Is your workplace very hot?'),
        (3,'Is your workplace very noisy?'),(2,'On leisure time, do you go to sports club or gym?'),
        (1,'Recently, are you in poor appetite or overeating?'),(57,'To your best knowledge, do you snore?');";

       if ($link->query($sql) === TRUE) {
           echo "<br>Data: Traits inserted successfully";
       } else {
           echo "<br>Error inserting Traits data " . $link->error;}

    //--------------------------------------------------------
    //----------- insert into the Diseases table ---------------
    //--------------------------------------------------------
    $sql = "Insert into Diseases (id, disease_name, description)
         values
         (1,'Depression','You are unfortuantely at high risk of getting Depression.
         Please be aware of the seriousness of this. Please consult a Psychologist
         right away if you\' done the test seriously. We as programmers all have
         suffered from burnt out and vallies of our lives. But keep in mind that
         depression is treatable. You just need some help to get up again. Try
         hug your firends, hug your family members. Go meet people, let your self
         open for a while. Things can get back together after all. Based on our
         knowledge, the best solustion is still counseling a psychotherapist, who
         is professional and experienced. You\'ll probably find them the best
         people who could understand you.'),(2,'Diabetes','You are unfortuantely
         at high risk of getting Diabetes. here\'s the sugeestion: 1. Go to consult
         a doctor, since our body is really conplex, simple test as ours are not
         accurate sometimes and you can get more information regarding this disease
         from the doctor. 2. Get at least 150 minutes per week of aerobic exercise,
         such as walking or cycling. 3. Cut saturated and trans fats, along with
         refined carbohydrates, out of your diet. 4. Eat more fruits, vegetables,
         and whole grains. 5. Eat smaller portions. 6. Try to lose 7 percentTrusted
         Source of your body weight if you’re overweight or obese.');";

       if ($link->query($sql) === TRUE) {
           echo "<br>Data: Diseases inserted successfully";
       } else {
           echo "<br>Error inserting Diseases data " . $link->error;}

    //--------------------------------------------------------
    //----------- insert into the Correlations table ---------------
    //--------------------------------------------------------
    $sql = "Insert into Correlations (trait_id, disease_id, rg)
         values
         (1,1,0.50930),(2,1,-0.31180),(3,1,0.31200),(4,1,0.33740),(5,1,0.38150),
         (6,1,0.75270),(7,1,-0.31580),(8,1,0.53140),(9,1,0.64810),(10,1,0.35890),
         (11,1,0.49790),(12,1,0.28710),(13,1,-0.16040),(14,1,0.48470),
         (15,1,0.49620),(16,1,-0.28460),(17,1,-0.18060),(18,1,-0.25670),
         (19,1,0.62870),(20,1,-0.20370),(21,1,0.57350),(22,1,0.66510),
         (23,1,0.52300),(24,1,0.28920),(25,1,-0.16780),(26,1,0.70140),
         (27,1,0.41180),(28,1,0.26350),(29,1,-0.15790),(30,1,0.26000),
         (31,1,0.43720),(32,1,0.70700),(33,1,-0.48070),(34,1,-0.55430),
         (35,1,-0.28340),(36,1,-0.24380),(37,1,0.36480),(38,2,0.99620),
         (39,2,0.59020),(40,2,0.50420),(41,2,0.46690),(42,2,0.46030),
         (43,2,0.44870),(44,2,0.42230),(45,2,0.40310),(46,2,0.38680),
         (47,2,0.33540),(48,2,0.33540),(49,2,0.33540),(50,2,0.31580),
         (51,2,-0.47770),(52,2,-0.42620),(53,2,-0.42470),(54,2,-0.41380),
         (55,2,0.37190),(56,2,-0.35100),(57,2,-0.29300);";

      if ($link->query($sql) === TRUE) {
          echo "<br>Data: Correlations inserted successfully";
      } else {
          echo "<br>Error inserting Correlations data " . $link->error;

        

include("disconnectDB.php");
}?>
