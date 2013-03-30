package com.LegoLabTeam.WebAppTests;

import junit.framework.Test;
import junit.framework.TestSuite;



/***
 * The main class for testing our web app GUI.
 * @author Zack Coker
 *
 */
public class WebAppTestMain {

	/***
	 * Creates a test suite.  This suite can contain multiple tests classes which
	 * each hold multiple tests. 
	 * @return: a suite of JUnit test cases
	 */
	public static Test suite() {
	    TestSuite suite = new TestSuite();
	    suite.addTestSuite(NavigationTests.class);
	    //suite.addTestSuite(StationStaticDisplayTests.class);
	    //suite.addTestSuite(CellStaticDisplayTests.class);
	    //suite.addTestSuite(LabStaticDisplayTests.class);
	    return suite;
	  }

	/***
	 * Runs the test cases
	 * @param args
	 */
	  public static void main(String[] args) {
	    junit.textui.TestRunner.run(suite());
	  }

}
