import { NextRequest, NextResponse } from 'next/server';
import {handleError} from "@/lib/errorHandler";
import { haveConversation } from '@/lib/conversation2measurements';
import { text2measurements } from '@/lib/text2measurements';

export async function POST(request: NextRequest) {
  let { statement, utcDateTime, timeZoneOffset, text, previousStatements } = await request.json();

  if(!statement){statement = text;}
   //TODO: replace previous statements properly
  try {
    //const measurements = await text2measurements(statement, utcDateTime, timeZoneOffset);
    //haveConversation
    //input: statement, utcDateTime, timeZoneOffset, previousStatements)
    //output: questionForUser, measurements
    const { questionForUser, measurements } = await haveConversation(statement, utcDateTime, timeZoneOffset, previousStatements);

    return NextResponse.json({ success: true, measurements: measurements, question:questionForUser });
  } catch (error) {
    return handleError(error, "voice2measurements")
  }
}

export async function GET(req: NextRequest) {
  const urlParams = Object.fromEntries(new URL(req.url).searchParams);
  const statement = urlParams.statement as string;
  const utcDateTime = urlParams.utcDateTime as string;
  const previousStatements = ""; //TODO: replace previous statements properly

  let timeZoneOffset = 0;
  if(urlParams.timeZoneOffset){
    timeZoneOffset = parseInt(urlParams.timeZoneOffset);
  } else {
    console.error("timeZoneOffset is not provided");
  }

  try {
    const { questionForUser, measurements } = await haveConversation(statement, utcDateTime, timeZoneOffset, previousStatements);
    return NextResponse.json({ success: true, measurements: measurements, question:questionForUser  });
  } catch (error) {
    return handleError(error, "voice2measurements");
  }
}
