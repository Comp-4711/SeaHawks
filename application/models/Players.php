<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Players extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    // Set up the mock data for the team roster, hardcoded for A1
    // Each player has a name, associated image, position and biography
    // Returns an array of all team members on the roster
    function all() {
        $members = array(
            array(
                'name' => 'Russell Wilson',
                'position' => 'Quarterback',
                'filename' => 'wilson_russell_0.png',
                'bio' => 'Drafted with the 12th pick in the third round (75th overall) of the 2012 NFL Draft. The first quarterback drafted under Head Coach Pete Carroll and General Manager John Schneider and the highest quarterback selected by the club since Brock Huard was taken with the 77th overall pick in 1999.'
            ),
            array(
                'name' => 'Marshawn Lynch',
                'position' => 'Running back',
                'filename' => 'lynch_marshawn_0.png',
                'bio' => 'Traded by Buffalo to Seattle for a 2011 fourth-round draft choice and an undisclosed 2012 choice on October 5, 2010. Re-signed to a multi-year contract in 2012 and extended in 2015.'
            ),
            array(
                'name' => 'Richard Sherman',
                'position' => 'Cornerback',
                'filename' => 'sherman_richard_0.png',
                'bio' => 'Drafted with the 23rd pick in the fifth-round of the 2011 NFL Draft (154th overall). Signed a multi-year extension on May 7, 2014.'
            ),
            array(
                'name' => 'Jimmy Graham',
                'position' => 'Tight end',
                'filename' => 'graham_jimmy_1.png',
                'bio' => 'Acquired via trade with the New Orleans Saints on the first day of free agency, March 10, 2015. Seattle also obtained the Saints 2015 fourth-round draft selection in exchange for the Seahawks 2015 first-round choice and center Max Unger.'
            ),
            array(
                'name' => 'Kam Chancellor',
                'position' => 'Strong safety',
                'filename' => 'chancellor_kam_0.png',
                'bio' => 'Selected with the second pick (133 overall) in the fifth round of the 2010 NFL Draft. Second safety drafted in that draft (Earl Thomas - 14th overall). Signed a multi-year extension with Seattle on April 22, 2013.'
            ),
            array(
                'name' => 'Michael Bennett',
                'position' => 'Defensive end',
                'filename' => 'bennett_michael_0.png',
                'bio' => 'Signed by the Seahawks as an unrestricted free agent on March 15, 2013, and re-signed a multi-year contract March 10, 2014.'
            ),
            array(
                'name' => 'Chris Matthews',
                'position' => 'Wide receiver',
                'filename' => 'matthews_chris_0.png',
                'bio' => 'Signed by Seattle as a free agent on February 18, 2014. Released after training camp and signed to Seattle’s practice squad on October 29. Signed to active roster on December 6.'
            ),
            array(
                'name' => 'Bobby Wagner',
                'position' => 'Middle Linebacker',
                'filename' => 'wagner_bobby_0.png',
                'bio' => 'Drafted with the 15th pick in the second round (47th overall) of the 2012 NFL Draft. Eleventh linebacker chosen in the second round in club history (Last: Lofa Tatupu, 2005). Second and highest player drafted out of Utah State in club history.'
            ),
            array(
                'name' => 'Luke Willson',
                'position' => 'Tight end',
                'filename' => 'willson_luke_0.png',
                'bio' => 'Selected with the third of three fifth-round choice (158th overall) in the 2013 NFL Draft. First player from Rice to ever be drafted by Seattle.'
            ),
            array(
                'name' => 'Earl Thomas',
                'position' => 'Free safety',
                'filename' => 'thomas_earl_0.png',
                'bio' => 'Drafted with the 14th overall pick in the 2010 NFL Draft. Signed a multi-year extension April 28, 2014.'
            ),
            array(
                'name' => 'Tyler Lockett',
                'position' => 'Wide receiver',
                'filename' => 'lockett_tyler_0.png',
                'bio' => 'Drafted with the fifth pick in the third round (69th overall) of the 2015 NFL Draft. Seattle traded its third-round (#95), fourth-round (#112), fifth-round (#167) and sixth-round (#181) picks to Washington to move up in the third round to select Lockett. Second-highest player drafted out of Kansas St. and only the fourth player drafted out of Kansas St. in club history (Last: Chris Harper, 2013).'
            ),
            array(
                'name' => 'Doug Baldwin',
                'position' => 'Wide receiver',
                'filename' => 'baldwin_doug.png',
                'bio' => 'Originally signed by Seattle as a rookie free agent on July 26, 2011. Signed a multi-year extension on May 29, 2014.'
            ),
            array(
                'name' => 'Bruce Irvin',
                'position' => 'Outside Linebacker',
                'filename' => 'irvin_bruce_0.png',
                'bio' => 'Selected by Seattle with the 15th overall pick in the 2012 NFL Draft.'
            ),
            array(
                'name' => 'Jermaine Kearse',
                'position' => 'Wide receiver',
                'filename' => 'kearse_jermaine_0.png',
                'bio' => 'Signed by Seattle as a rookie free agent on April 28, 2012.'
            ),
            array(
                'name' => 'Jon Ryan',
                'position' => 'Punter',
                'filename' => 'ryan_john.png',
                'bio' => 'Signed by Seattle as a free agent on September 9, 2008.'
            ),
            array(
                'name' => 'Derrick Coleman',
                'position' => 'Fullback',
                'filename' => 'coleman_derrick_0.png',
                'bio' => 'Signed to the Seahawks practice squad on December 5, 2012, before making the 53-man roster to open the 2013 season.'
            ),
            array(
                'name' => 'Ricardo Lockette',
                'position' => 'Wide receiver',
                'filename' => 'lockette_ricardo_0.png',
                'bio' => 'Signed to Seattle’s active roster on October 30, 2013, from the team’s practice squad, where he had signed October 22.'
            ),
            array(
                'name' => 'Frank Clark',
                'position' => 'Defensive end',
                'filename' => 'clark_frank_0.png',
                'bio' => 'Selected with the 31st pick in the second round (63rd overall) in the 2015 NFL Draft. Third player drafted out of Michigan in club history (Last: Steve Hutchinson, 2001).'
            ),
            array(
                'name' => 'Paul Richardson',
                'position' => 'Wide receiver',
                'filename' => 'richardson_paul_0.png',
                'bio' => 'Selected with the 13th pick in the second round (45th overall) in the 2014 NFL Draft. Third highest receiver chosen in club history. Sixth player drafted out of Colorado in club history (Last: D.J. Hackett, 2004).'
            ),
            array(
                'name' => 'B.J. Daniels',
                'position' => 'Wide receiver',
                'filename' => 'daniels_b.j_0.png',
                'bio' => 'Claimed off waivers (San Francisco) on October 2, 2013.'
            )
        );
        return $members;
    }


}